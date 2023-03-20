  @props(['name'])

    <div class="form-group">
    <label for="{{ $name }}">{{ ucwords($name)}}</label>
    <div class="input-group">
        <div class="custom-file">
        <input type="file" name="{{ $name }}" value="{{ old($name) }}" class="custom-file-input @error('{{ $name }}') is-invalid @enderror" id="{{ $name }}">
        <label class="custom-file-label" for="{{ $name }}">Choose file for {{$name}} </label>
        </div>
        <div class="input-group-append">
        <span class="input-group-text">Upload</span>
        </div>
    </div>
    <x-forms.error name="{{$name}}"/>
    </div>
