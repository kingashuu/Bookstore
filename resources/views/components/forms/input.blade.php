  @props(['name', 'type' => 'text'])

  <div class="form-group">
      <label for="{{ $name }}">{{ ucwords($name) }}</label>
      <input class="form-control @error('{{ $name }}') is-invalid @enderror"
          placeholder="Enter {{ $name }}" type="{{ $type }}" name="{{ $name }}"
          {{ $attributes(['value' => old($name)]) }}>
      <x-forms.error name="{{ $name }}" />

  </div>
