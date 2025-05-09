<?php

// Se importan las clases necesarias del framework y del proyecto
use App\Models\User; // Modelo User
use Illuminate\Support\Facades\Auth; // Facade de autenticación de Laravel
use Illuminate\Support\Facades\Session; // Para manejar sesiones
use Illuminate\Validation\Rule; // Para validar reglas personalizadas
use Livewire\Volt\Component; // Componente base de Livewire Volt

// Se crea una clase anónima que extiende de Livewire Volt Component
new class extends Component {
    // Propiedades públicas para nombre y correo electrónico del usuario
    public string $name = '';
    public string $email = '';

    /**
     * Método que se ejecuta al montar el componente (al cargar)
     */
    public function mount(): void
    {
        // Se cargan los datos del usuario autenticado
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Método para actualizar la información del perfil del usuario autenticado
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user(); // Se obtiene el usuario autenticado

        // Se valida el formulario
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id) // Asegura que el correo sea único, ignorando el del usuario actual
            ],
        ]);

        // Se actualizan los datos del usuario
        $user->fill($validated);

        // Si se cambió el correo, se borra la verificación anterior
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Se guardan los cambios
        $user->save();

        // Se lanza un evento personalizado llamado 'profile-updated'
        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Método para reenviar el correo de verificación
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        // Si ya está verificado, redirige al dashboard
        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));
            return;
        }

        // Envía el correo de verificación
        $user->sendEmailVerificationNotification();

        // Almacena mensaje de estado en la sesión
        Session::flash('status', 'verification-link-sent');
    }
};
?>


<section class="w-full">
    <!-- Encabezado general de configuración -->
    @include('partials.settings-heading')

    <!-- Componente de diseño con títulos en español -->
    <x-settings.layout :heading="'Perfil'" :subheading="'Actualiza tu nombre y dirección de correo electrónico'">
        
        <!-- Formulario para actualizar perfil -->
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            
            <!-- Campo de entrada para el nombre -->
            <flux:input wire:model="name" :label="'Nombre'" type="text" required autofocus autocomplete="name" />

            <div>
                <!-- Campo de entrada para el email -->
                <flux:input wire:model="email" :label="'Correo electrónico'" type="email" required autocomplete="email" />

                <!-- Verificación de correo si aún no está verificado -->
                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                    <div>
                        <!-- Texto de advertencia si el correo no está verificado -->
                        <flux:text class="mt-4">
                            {{ 'Tu dirección de correo electrónico no está verificada.' }}

                            <!-- Enlace para reenviar el correo de verificación -->
                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ 'Haz clic aquí para reenviar el correo de verificación.' }}
                            </flux:link>
                        </flux:text>

                        <!-- Mensaje cuando se ha enviado el enlace -->
                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ 'Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.' }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Botón de guardar y mensaje de éxito -->
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ 'Guardar' }}</flux:button>
                </div>

                <!-- Mensaje que aparece cuando se actualiza el perfil -->
                <x-action-message class="me-3" on="profile-updated">
                    {{ 'Guardado.' }}
                </x-action-message>
            </div>
        </form>

        <!-- Inclusión del formulario para eliminar cuenta -->
        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
