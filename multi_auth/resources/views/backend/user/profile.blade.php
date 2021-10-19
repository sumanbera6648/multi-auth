@extends('backend.layouts.master')
@section('title','Profile')
@section('main-content')
<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex ">
                    <h3 class="">Profile</h3>
                    
                </div>
                <div class="text-center user-info">
                    @if($profile->photo)
                    <img src="{{asset('profile_photo')}}/{{$profile->photo}}" alt="avatar" height="100px" width="102px">
                    @else
                    <img src="{{asset('backend/assets/img/90x90.jpg')}}" alt="avatar">
                    @endif

                    <p class="">{{$profile->name}}</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                {{$profile->name}}
                            </li>
                            
                            
                            <li class="contacts-block__item">
                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$profile->email}}</a>
                            </li>
                            
                            <li class="contacts-block__item">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
        <div class="skills ">
            <div class="widget-content">
                <form id="general-info" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data" class="section general-info">
                    @csrf
                    <input type="hidden" name="id" value="{{$profile->id}}">
                    <div class="info">
                        <h6 class="">General Information</h6>
                        <div class="row">
                            <div class="col-lg-11 mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                        <div class="form ">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="fullName"></label>
                                                        <input type="text" name="name" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{$profile->name}}">
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="profession">{{$profile->name}}</label>
                                                <input type="text" name="email" id="email" placeholder="email" class="form-control mb-4" id="profession" placeholder="Designer" value="{{$profile->email}}">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="profession">Photo</label>
                                                <input type="hidden" name="old_photo" value="{{$profile->photo}}">
                                                <input type="file" name="photo" id="email" placeholder="email" class="form-control mb-4" id="profession" placeholder="Designer" value="{{$profile->photo}}">
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success mb-2">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        

    </div>


</div>
@endsection
