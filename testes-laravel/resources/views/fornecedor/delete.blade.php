@include('block.header')

    <h4>{{Session('menssagem')}}</h4>
    <form action="{{Route('fornecedor.delete')}}" method="POST">
    @csrf
        CNPJ:
        <input name="cnpj">
        <br>
        <button>Verificar</button>
    </form>

    