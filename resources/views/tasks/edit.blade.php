<x-layout>
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{ route('task.edit_action') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $task['id'] }}">

            <x-form.checkbox_input name="is_done" label="Tarefa Realizada ?" checked="{{ $task->is_done }}"
                 />

            <x-form.text_input name="title" label="Titulo da Task" value="{{ $task->title }}"
                placeholder="Digite o título da tarefa" />

            <x-form.text_input type="datetime-local" name="due_date" id="due_date" label="Data de realização"
                value="{{ $task->due_date }}" placeholder="Digite o título da tarefa" />

            <x-form.select_input name="category_id" label="Categoria">
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @if ($category['id'] == $task['category_id']) selected @endif>
                        {{ $category['title'] }}
                    </option>
                @endforeach

            </x-form.select_input>

            <x-form.textarea_input name="description" cols="30" rows="10"
                placeholder="Digite uma descrição para sua tarefas" value="{{ $task['description'] }}" />

            <x-form.form_button>
                <x-form.button type="reset" class="btn-secundary">Resetar</x-form.button>
                <x-form.button type="submit" class="btn-primary">Atualizar Tarefa</x-form.button>
            </x-form.form_button>
        </form>
    </section>

</x-layout>

