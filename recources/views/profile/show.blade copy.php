<x-app-layout style="display: content">
      <div>

      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 " >

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
<!--
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
-->
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
    
   
</style>