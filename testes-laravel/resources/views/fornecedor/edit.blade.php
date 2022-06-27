@include('block.header')
<h3>Editar informações do Fornecedor</h3>

@if(Session::has('Match'))
    @php 
        $fornecedor = session('fornecedor')
    @endphp
    <h4>{{Session('Match')}}: {{$fornecedor->nome}}</h4>
    
    <form action="{{Route('fornecedor.update')}} " method="POST">
    @csrf
        Nome:
        <input name="nome">
        <br>
        Cnpj:
        <input name="cnpj">
        <br>
        Telefone:
        <input name="telefone">
        <br>
        <button type="submit">Atualizar</button>
    </form>
@else
    <h4>{{Session('Menssagem')}}</h4>
    <form action="{{Route('fornecedor.check')}}" method="POST">
    @csrf
        CNPJ:
        <input name="cnpj">
        <br>
        <button>Verificar</button>
    </form>
@endif