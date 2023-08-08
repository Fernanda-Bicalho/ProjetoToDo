<x-layout page="B7web ToDo: Login">
    <x-slot:btn><a href="{{ route('login') }}" class="btn btn-primary">Voltar</a></x-slot:btn>

    <section id="create_task_section">
        <h1>Registrar-se</h1>
        <form method="POST" action="{{ route('user.register_action') }}">
            @csrf

            <x-form.text_input name="name" label="Nome" class="form-control @error('name') is-invalid @enderror" placeholder="Digite seu nome" />
            @error('name')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;">{{$message}}</div>
            @enderror

            <x-form.text_input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"  label="E-mail"
                placeholder="Digite seu email" />
            @error('email')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;" >{{$message}}</div>
            @enderror

            <x-form.text_input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" label="Senha"
                placeholder="Digite sua senha" />
            @error('password')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;">{{$message}}</div>
            @enderror

            <x-form.text_input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" label="Confirme sua Senha"
                placeholder="Digite sua senha novamente" />
            @error('password')
                <div class="invalid-feedback" style="margin-bottom: 15px; color: red; font-size:13px;">{{$message}}</div>
            @enderror

            <x-form.form_button>
                <x-form.button type="reset" class="btn-secundary">Limpar</x-form.button>
                <x-form.button type="submit" class="btn-primary">Registre-se</x-form.button>
            </x-form.form_button>
        </form>
    </section>
</x-layout>
