@include('block.header')
<h3>Insira os dados para cadastrar o fornecedor</h3>
<form action="{{Route('fornecedor.create')}}" method="POST">
@csrf
    Nome:
    <input name="nome">
    <br>
    CNPJ:
    <input name="cnpj">
    <br>
    Telefone:
    <input name="telefone">
    <br>
    <button>Salvar</button>
</form>