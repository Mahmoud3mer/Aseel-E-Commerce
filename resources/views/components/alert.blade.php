@props(['type' => 'info', 'message'])

<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert"
    style="position: fixed; top: 90px; right: 20px; z-index: 1000;">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>