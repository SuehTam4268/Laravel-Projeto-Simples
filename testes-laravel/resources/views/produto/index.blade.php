@include('block.header')
<h3>Cadastrar Produto</h3>
@if(Session::has('Menssagem'))
    <h3>{{Session('Menssagem')}}</h3>
@endif
<form action="{{Route('produto.create')}}" method="POST">
    @csrf
        <label for="cars">Selecione o fornecedor:</label>
        <select name="fornecedor" id="cars">
            @foreach($fornecedores as $fornecedor)
                
                <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>

            @endforeach      
        </select>
<br>
    Nome:
    <input name="nome">
    <br>
    Preco:
    <input name="preco"> 
    <br>
    Codigo
    <input name="codigo"> 
    <br>
    <button>Salvar</button>
</form>