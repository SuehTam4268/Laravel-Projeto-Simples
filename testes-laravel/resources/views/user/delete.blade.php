@include('block.header')
@if(Session::has('Mensagem'))
    <h3>{{Session('Mensagem')}}</h3>
@endif
<form action="{{Route('user.delete')}}" method="post">
@method('DELETE')
@csrf
    <h3>Insira os dados para deletar o usuario</h3>
    Email:
    <input name="email">
    <br>
    Senha:
    <input name="password">
    <button type="submit">Deletar</button>
</form>