@include('block.header')

@if(Session::has('Erro'))
    <h3>Nenhum Registro encontrado com essas credenciais</h3>
@endif
@if(Session::has('UpdateSuccess'))
    <h3>{{Session('UpdateSuccess')}}</h3>
@endif
@if(Session::has('Match'))
    <form action="{{Route('user.edit')}}" method="GET">

        
        Editar Nome:
        <input name="name">
        <br>
        Editar Email:
        <input name="email">
        <br>
        Editar Senha:
        <input name="password">
        <button>Salvar</button>
    </form>
@else
    <form action="{{Route('user.check')}}" method="GET">

    <h3>Favor Insira seu email e senha</h3>
    Email
    <input name="email">
    <br>
    Senha
    <input name="password" >
    <button>Verificar</button>
</form>
@endif
