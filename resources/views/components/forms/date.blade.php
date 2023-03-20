@props(['name'])
<div class="form-group">
    <label for="{{ $name }}">{{ ucwords($name) }}</label>
    <input class="form-control @error('{{ $name }}') is-invalid @enderror" placeholder="Please select Date Time"
        type="date" name="{{ $name }}" id="basicDate" data-input {{ $attributes(['value' => old($name)]) }}>
    <x-forms.error name="{{ $name }}" />
    <script>
        config = {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        }
        flatpickr("#basicDate", config);
    </script>
</div>
