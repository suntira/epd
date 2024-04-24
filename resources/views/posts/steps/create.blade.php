@extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
        <div class="auth_container">
            <form action="{{ route('posts.steps.store', ['post' => $post->id]) }}" id="create-steps-form" method="post" enctype="multipart/form-data">
                <p class="p1">Создание урока</p>
                @csrf
                <div class="steps" id="steps-container">
                    <!-- Здесь будут динамически добавленные поля -->
                </div>
                <button type="button" class="btn_red" onclick="addStep()">Добавить шаг</button>
                <button type="submit" class="btn_red" id="create-lesson-btn" style="display: none;">Создать урок</button>
            </form>
            
            <script>
                function addStep() {
                    var stepsContainer = document.getElementById('steps-container');
                    var stepIndex = stepsContainer.children.length; // Получаем количество шагов
            
                    var stepDiv = document.createElement('div');
                    stepDiv.className = 'step';
            
                    var textInput = document.createElement('input');
                    textInput.type = 'text';
                    textInput.name = 'steps[' + stepIndex + '][text_st]';
                    textInput.placeholder = 'Описание шага ' + (stepIndex + 1);
            
                    var imgInput = document.createElement('input');
                    imgInput.type = 'file';
                    imgInput.name = 'steps[' + stepIndex + '][img_st]';
                    imgInput.placeholder = 'Изображение шага ' + (stepIndex + 1);
            
                    var orderInput = document.createElement('input');
                    orderInput.type = 'hidden'; // Меняем тип на скрытый
                    orderInput.name = 'steps[' + stepIndex + '][order]';
                    orderInput.value = stepIndex + 1; // Присваиваем порядковый номер шага
            
                    var orderLabel = document.createElement('label');
                    orderLabel.textContent = 'Номер шага ' + (stepIndex + 1);
            
                    stepDiv.appendChild(textInput);
                    stepDiv.appendChild(imgInput);
                    stepDiv.appendChild(orderLabel); // Добавляем метку
                    stepDiv.appendChild(orderInput); // Добавляем скрытое поле
            
                    stepsContainer.appendChild(stepDiv);
            
                    // Показываем кнопку "Создать урок"
                    document.getElementById('create-lesson-btn').style.display = 'inline-block';
                }
            </script>
    </div>
</div>
</div>
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection