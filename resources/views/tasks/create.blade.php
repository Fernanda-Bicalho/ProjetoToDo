<x-layout>
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf

            <x-form.text_input name="title" label="Titulo da Task" placeholder="Digite o título da tarefa" />

            <x-form.text_input type="datetime-local" name="due_date" id="due_date" label="Data de realização"
                placeholder="Digite o título da tarefa" />

            <x-form.select_input name="category_id" label="Categoria">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach

            </x-form.select_input>

            <x-form.textarea_input name="description" cols="30" rows="10"
                placeholder="Digite uma descrição para sua tarefas" />

            <x-form.form_button>
                <x-form.button type="button" class="btn-secundary">Cancelar</x-form.button>
                <x-form.button type="submit" class="btn-primary">Enviar</x-form.button>
            </x-form.form_button>
        </form>
    </section>
</x-layout>

