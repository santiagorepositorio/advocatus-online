<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Exception;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Color;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QRGeneration extends Component
{
    use AuthorizesRequests;

    public $profile;
    public $margin = 1;
    public $errorC = 'L';
    public $style = 'square'; // Or 'square', 'round'
    public $eye = 'square'; // Or 'square'
    public $eyeColorHexi = '#000000';
    public $eyeColorHex = '#000000';
    public $includeLogo = false;
    public $logoData; // Base64 encoded logo data (optional)
    public $backgroundColor = '#ffffff';
    public $colorHex = '#000000';
    public $colorHex1 = '#000000';
    public $foregroundColor = [250, 200, 215];
    public $qrcode;
    public $checkII = false;
    public $checkIS = false;
    public $checkDS = false;
    public $degradado = false;
    public $selectedEyeColors = [false, false, false];
    public $from = [255, 0, 0];
    public $to = [0, 0, 255];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->generateQrCode();
    }
    public function render()
    {


        return view('livewire.profile.q-r-generation')->layout('layouts.profile');
    }
    // public function updatedCheck($index)
    // {
    //     // Cambiar el estado del color de ojos seleccionado
    //     $this->selectedEyeColors[$index] = !$this->selectedEyeColors[$index];

    //     // Generar el código QR con los colores de ojos seleccionados
    //     $this->generateQrCode();
    // }

    public function updatedErrorC()
    {
        $this->generateQrCode();
    }

    public function toggleDegradado()
    {
        $this->degradado = !$this->degradado;
        $this->generateQrCode();
    }
    public function toggleCheckII()
    {
        $this->checkII = !$this->checkII;
        $this->generateQrCode();
    }

    public function toggleCheckIS()
    {
        $this->checkIS = !$this->checkIS;
        $this->generateQrCode();
    }

    public function toggleCheckDS()
    {
        $this->checkDS = !$this->checkDS;
        $this->generateQrCode();
    }

    public function updatedMargin()
    {
        $this->generateQrCode();
    }
    public function updatedEye()
    {
        $this->generateQrCode();
    }
    public function updatedStyle()
    {
        $this->generateQrCode();
    }
    public function updatedEyeColorHex($value)
    {
        // Convert hex to RGB
        $this->eyeColorHex = $value;
        $this->generateQrCode();
    }
    public function updatedEyeColorHexi($value)
    {
        // Convert hex to RGB
        $this->eyeColorHexi = $value;
        $this->generateQrCode();
    }
    public function updatedColorHex($value)
    {
        // Convert hex to RGB
        $this->colorHex = $value;
        $this->generateQrCode();
    }
    public function updatedColorHex1($value)
    {
        // Convert hex to RGB
        $this->colorHex1 = $value;
        $this->generateQrCode();
    }
    public function updatedBackgroundColor($value)
    {
        // Convert hex to RGB
        $this->backgroundColor = $value;
        $this->generateQrCode();
    }

    public function hexToRgb($hex)
    {
        $hex = str_replace('#', '', $hex);

        if (strlen($hex) === 3) {
            $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
            $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
            $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return [$r, $g, $b];
    }

    public function generateQrCode()
    {
        $bgColor = $this->hexToRgb($this->backgroundColor);
        $fgColor = $this->hexToRgb($this->colorHex);
        $fgColor1 = $this->hexToRgb($this->colorHex1);
        $eyeColor = $this->hexToRgb($this->eyeColorHex);
        $eyeColori = $this->hexToRgb($this->eyeColorHexi);
        // $fgColor = $this->foregroundColor;

        $qrCodeContent = QrCode::backgroundColor($bgColor[0], $bgColor[1], $bgColor[2])
            ->errorCorrection($this->errorC) //L: Low (7% correction), M: Medium (15% correction),  Q: Quartile (25% correction), H: High (30% correction)
            ->size(300)
            ->margin($this->margin)
            ->style($this->style) //square, dot, round
            ->eye($this->eye); //square, circle
            
            if ($this->degradado) {
                $qrCodeContent->gradient($fgColor[0], $fgColor[1], $fgColor[2], $fgColor1[0], $fgColor1[1], $fgColor1[2], 'diagonal');
                # code...
            } else {
                # code...
                $qrCodeContent->color($fgColor[0], $fgColor[1], $fgColor[2]);
            }
            
            
        // ->errorCorrection('H')
        // ->generate(env('APP_URL') . '/' . $this->profile->slug);
        
            if ($this->checkII == true) {
                $qrCodeContent->eyeColor(0, $eyeColor[0], $eyeColor[1], $eyeColor[2], $eyeColori[0], $eyeColori[1], $eyeColori[2]);
            }
        
            if ($this->checkIS == true) {
                $qrCodeContent->eyeColor(1, $eyeColor[0], $eyeColor[1], $eyeColor[2], $eyeColori[0], $eyeColori[1], $eyeColori[2]);
            }
        
            if ($this->checkDS == true) {
                $qrCodeContent->eyeColor(2, $eyeColor[0], $eyeColor[1], $eyeColor[2], $eyeColori[0], $eyeColori[1], $eyeColori[2]);
            }
        
        $this->qrcode = base64_encode($qrCodeContent->generate(env('APP_URL') . '/' . $this->profile->slug));
    }
}
