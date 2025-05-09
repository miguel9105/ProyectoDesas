<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

// Se define una clase anónima que extiende de Component (Livewire Volt)
new class extends Component {
    // Propiedad pública para almacenar la contraseña ingresada por el usuario
    public string $password = '';

    /**
     * Método para eliminar al usuario autenticado actualmente.
     */
    public function deleteUser(Logout $logout): void
    {
        // Se valida que la contraseña ingresada sea obligatoria, de tipo cadena y coincida con la del usuario actual
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        // Se obtiene el usuario autenticado con Auth::user(), se ejecuta el cierre de sesión con $logout y se elimina el usuario
        tap(Auth::user(), $logout(...))->delete();

        // Se redirige al usuario a la página principal después de la eliminación
        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <!-- Título y subtítulo de la sección -->
    <div class="relative mb-5">
        <flux:heading>{{('Eliminar cuenta') }}</flux:heading> <!-- Encabezado: "Eliminar cuenta" -->
        <flux:subheading>{{('Elimina tu cuenta y todos sus recursos') }}</flux:subheading> <!-- Subtítulo explicativo -->
    </div>

    <!-- Botón que activa el modal de confirmación -->
<flux:modal.trigger name="confirm-user-deletion">
    <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ 'Eliminar cuenta' }} <!-- Texto del botón: "Eliminar cuenta" -->
    </flux:button>
</flux:modal.trigger>

<!-- Modal de confirmación para eliminar la cuenta -->
<flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
    <!-- Formulario que llama al método deleteUser de Livewire al enviar -->
    <form wire:submit="deleteUser" class="space-y-6">
        <div>
            <flux:heading size="lg">{{ '¿Estás seguro de que deseas eliminar tu cuenta?' }}</flux:heading>
            <flux:subheading>
                {{ 'Una vez eliminada tu cuenta, todos sus recursos y datos serán eliminados permanentemente. Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.' }}
            </flux:subheading>
        </div>

        <!-- Campo de entrada para la contraseña -->
        <flux:input wire:model="password" :label="'Contraseña'" type="password" />

        <!-- Botones de acción: cancelar o confirmar eliminación -->
        <div class="flex justify-end space-x-2 rtl:space-x-reverse">
            <flux:modal.close>
                <flux:button variant="filled">{{ 'Cancelar' }}</flux:button>
            </flux:modal.close>

            <flux:button variant="danger" type="submit">{{ 'Eliminar cuenta' }}</flux:button>
        </div>
    </form>
</flux:modal>

</section>
