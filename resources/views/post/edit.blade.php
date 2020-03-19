@extends('layouts.app')

@section('content')
    <router-view></router-view>
@endsection
@push('scripts')
    <script>
        let value = parseInt('{{$post->id}}');
    </script>
@endpush
