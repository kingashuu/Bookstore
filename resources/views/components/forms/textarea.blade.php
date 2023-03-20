  @props(['name'])
  <div for="{{ $name }}" class="form-group">
      <label for="{{ $name }}"> {{ ucwords($name) }}</label>
      <textarea  name="{{ $name }}"
          class="form-control @error('{{ $name }}') is-invalid @enderror" placeholder="Enter {{ $name }} ..."
          rows="3" {{ $attributes }}>
          {{ $slot ?? old($name) }} </textarea>
      <x-forms.error name="{{ $name }}" />

  </div>
