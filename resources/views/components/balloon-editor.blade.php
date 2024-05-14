@props(['focus' => false])
<div class="border-b" wire:ignore x-data="{
    message: @entangle($attributes->wire('model')).defer,
    isFocus: false,
}" x-init="
$watch('message', value => {
    if(!value){
        balloonEditor.setData('');
    }   
});
BalloonEditor
    .create($refs.myEditor)
    .then( editor => {
        balloonEditor = editor;
        if(message){
            editor.setData(message);
        }
        @if ($focus)
            editor.focus();
            isFocus = true;
        @endif
        editor.model.document.on('change:data', () => {
            message = editor.getData();
        });
        editor.editing.view.document.on('change:isFocused', (evt, data, isFocused) => {
            isFocus = isFocused;
        });
    })
    .catch( error => {
        console.error( error);
    })
">

    <div x-ref="myEditor" x-bind:class="isFocus ? 'bg-white' : ''"></div>
</div>