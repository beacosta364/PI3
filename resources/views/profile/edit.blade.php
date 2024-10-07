@extends('layouts.plantilla')

@section('contenido')


<style>
        body {
            font-family: Arial, sans-serif; /* Establecer una fuente base */
            background-color: #f9fafb; /* Color de fondo suave */
            color: #374151; /* Color de texto principal */
            padding: 20px; /* Espaciado general */
        }

        .space-y-6 > * + * {
            margin-top: 1.5rem; /* Espacio entre elementos */
        }

        header h2 {
            font-size: 1.5rem; /* Tamaño del título */
            font-weight: 600; /* Peso de la fuente */
            color: #111827; /* Color del texto del encabezado */
        }

        header p {
            margin-top: 0.5rem; /* Margen superior */
            color: #4b5563; /* Color del texto */
        }

        .danger-button {
            background-color: #ef4444; /* Color de fondo del botón de peligro */
            color: white; /* Color del texto */
            padding: 10px 20px; /* Espaciado interno */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambia el cursor al pasar */
            font-size: 1rem; /* Tamaño de fuente */
            transition: background-color 0.3s; /* Transición de color */
        }

        .danger-button:hover {
            background-color: #dc2626; /* Color de fondo al pasar el mouse */
        }

        .secondary-button {
            background-color: #e5e7eb; /* Color de fondo del botón secundario */
            color: #111827; /* Color del texto */
            padding: 10px 20px; /* Espaciado interno */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambia el cursor al pasar */
            font-size: 1rem; /* Tamaño de fuente */
            transition: background-color 0.3s; /* Transición de color */
        }

        .secondary-button:hover {
            background-color: #d1d5db; /* Color de fondo al pasar el mouse */
        }

        .modal {
            display: none; /* Ocultar por defecto */
            position: fixed; /* Fijar en la pantalla */
            top: 0; /* En la parte superior */
            left: 0; /* A la izquierda */
            right: 0; /* A la derecha */
            bottom: 0; /* En la parte inferior */
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro semi-transparente */
            justify-content: center; /* Centrar contenido */
            align-items: center; /* Centrar verticalmente */
        }

        .modal.show {
            display: flex; /* Mostrar el modal */
        }

        .modal-content {
            background-color: white; /* Color de fondo del contenido del modal */
            padding: 20px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            max-width: 500px; /* Ancho máximo */
            width: 100%; /* Ancho completo */
        }

        .input-error {
            color: #dc2626; /* Color del mensaje de error */
            font-size: 0.875rem; /* Tamaño de la fuente del error */
            margin-top: 0.5rem; /* Margen superior */
        }

        .text-input {
            width: 100%; /* Ancho completo */
            padding: 10px; /* Espaciado interno */
            border: 1px solid #d1d5db; /* Borde */
            border-radius: 5px; /* Bordes redondeados */
            transition: border-color 0.3s; /* Transición de color de borde */
        }

        .text-input:focus {
            border-color: #3b82f6; /* Color del borde al enfocar */
            outline: none; /* Sin contorno */
        }
    </style>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection

    

