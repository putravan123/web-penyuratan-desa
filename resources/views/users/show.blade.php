@extends('template.app')


@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="cover-photo" style="background-image: url('{{ asset('storage/' . ($user->cover_image ?? 'user.png')) }}'); height: 200px; background-size: cover; background-position: center; position: relative; display: flex; justify-content: center; align-items: center;">

                <div class="profile-photo" style="position: absolute; bottom: -60px; display: flex; justify-content: center; align-items: center;">
                    @if($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Photo" style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                    @else
                        <img src="{{ asset('img/user.png') }}" alt="Default User Icon" style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                    @endif
                </div>
            </div>
            <div class="mt-5 pt-4 text-center">
                <h2>{{ $user->name }}</h2>
                <div class="d-flex justify-content-center">
                    <table>
                        <tr>
                            <td class="text-left"><strong>Email</strong></td>
                            <td style="padding-left: 30px;"  class="text-left">: {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-left"><strong>Akun DI Buat</strong></td>
                            <td style="padding-left: 30px;"  class="text-left">: {{ $user->created_at->format('l, d F Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
