<x-layout page="B7web ToDo: Login">
    <x-slot:btn><a href="{{route('register')}}" class="btn btn-primary">Registre-se</a></x-slot:btn>

    <section id="create_task_section">
        <h1>Autenticação</h1>
        <form method="POST" action="{{ route('user.login_action') }}">
            @csrf

            <x-form.text_input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" label="E-mail"
                placeholder="Digite seu email" />
            @error('email')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;">{{$message}}</div>
            @enderror

            <x-form.text_input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" label="Senha"
                placeholder="Digite sua senha" />
            @error('password')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;">{{$message}}</div>
            @enderror

            <x-form.form_button>
                <x-form.button type="button" class="btn-secundary">Limpar</x-form.button>
                <x-form.button type="submit" class="btn-primary">Entrar</x-form.button>
            </x-form.form_button>
        </form>
    </section>



</x-layout>
