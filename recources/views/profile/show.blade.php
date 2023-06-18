<x-app-layout style="display: content">


<div>

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 " >
<h5 style="margin:10px">Update your Profile Information Here, To update your Profile picture, just click on it !</h5>
<br>
@if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-profile-information-form')
                </div>
                @endif
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

            @endif

</x-app-layout>

<style>
    .form-control{
        width: auto;
    }
    .bfh{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    button{
        width: 117px!important;
        max-width: fit-content;
    }
    .mt-10{
        display: contents;
    width: fit-content;
    }
    button[type=submit] {
        background-image: linear-gradient(310deg, #ff2121 0%, #fd2191 100%);
        align-self: center;
        justify-self: center;
        width: auto !important;
        border-radius: 8px;
    }
    .items-center{
        display: grid;
        box-shadow: none !important;
        margin: 10px;
    }
    input,label{
        margin:auto !important;
        text-align: center !important;
    }
   label{
    padding-top: 5px!important;
   }
    
   
</style>