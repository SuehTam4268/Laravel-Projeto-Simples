@include('block.header')
<div class="main">
    <h4>Escolha uma opção</h4>
    <div class="conteudo">
        <div class="OptiongUser">
            <h3>Opções usuario</h3>
   
            <a href="{{Route('user.CreateUser')}}">Create User</a>
            <br>
            <a href="{{Route('user.edit.index')}}">Edit User</a>
            <br>
            <a href="{{Route('user.index.delete')}}">Delet user</a>
        </div>
        <div class="OptionFornecedor">
            <h3>Opções fornecedor</h3>
 
            <a href="{{Route('fornecedor.create.Fornecedor.index')}}">Create Fornecedor</a>
            <br>
            <a href="{{Route('fornecedor.edit.Fornecedor.index')}}">Edit Fornecedor</a>
            <br>
            <a href="{{Route('fornecedor.delete.index')}}">Delete Fornecedor</a>
            <br>
        </div>
        <div class="OptionProdutos">
            <h3>Opções Produtos</h3>
      
            <a href="{{route('produto.index')}}">Create Produtos</a>
            <br>
            <a>Edit Produtos</a>
            <br>
            <a>Delete Produtos</a>
        </div>
    </div>
</div>

