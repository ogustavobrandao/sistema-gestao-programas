@extends("templates.app")

@section("body")

@canany(['admin', 'servidor'])

<style>
    select[multiple] {
        overflow: hidden;
        background: #f5f5f5;
        width: 100%;
        height: auto;
        padding: 0px 5px;
        margin: 0;
        border-width: 2px;
        border-radius: 5px;
        -moz-appearance: menulist;
        -webkit-appearance: menulist;
        appearance: menulist;
    }

    /* select single */
    .required .chosen-single {
        background: #F5F5F5;
        border-radius: 5px;
        border: 1px #D3D3D3;
        padding: 5px;
        box-shadow: inset 0px 3px 6px rgba(0, 0, 0, 0.25);
    }

    /* select multiple */
    .required .chosen-choices {
        background: #F5F5F5;
        border-radius: 5px;
        border: 1px #D3D3D3;
        padding: 0px 5px;
        box-shadow: inset 0px 3px 6px rgba(0, 0, 0, 0.25);
    }

    .titulo {
        font-weight: 600;
        font-size: 20px;
        line-height: 28px;
        display: flex;
        color: #131833;
    }

    .boxinfo {
        background: #F5F5F5;
        border-radius: 6px;
        border: 1px #D3D3D3;
        width: 100%;
        padding: 5px;
        box-shadow: inset 0px 3px 6px rgba(0, 0, 0, 0.25);
    }

    .boxchild {
        background: #FFFFFF;
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.25);
        border-radius: 20px;
        padding: 34px;
        width: 65%;
    }
</style>
<div class="container" style="display: flex; justify-content: center; align-items: center; margin-top: 1em; margin-bottom:10px; flex-direction: column;">
    @if (session('sucesso'))
    <div class="alert alert-success" style="width: 100%;">
        {{session('sucesso')}}
    </div>
    @endif
    <br>

    <div class="boxchild">
        <div class="row" style="display: flex; align-items: center;">
            <h1 style="font-weight: 600; font-size: 30px; line-height: 47px; color: #2D3875;">
                Vincular Aluno a {{$edital->nome}}</h1>
            <p style="font-weight: 400; font-size: 20px; color:gray;">{{$edital->descricao}}</p>
            <hr>
            <br>
            <br>
        </div>
        <form action="{{  route('edital.aluno', ['id' => $edital->id])  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="titulo" for="descricao">CPF do aluno</label>
            <input type="text" id="cpf" class="boxinfo" name="cpf" placeholder="cpf do aluno" required>
            <br>
            <br>
            <label class="titulo" for="valor_bolsa">Valor da bolsa</label>
            <input type="number" id="valor_bolsa" class="boxinfo" name="valor_bolsa" placeholder="valor da bolsa" required>
            <br>
            <br>
            <label class="titulo" for="bolsa">Tipo da bolsa</label>
            <input type="text" id="bolsa" class="boxinfo" name="bolsa" placeholder="bolsa" required>
            <br>
            <br>
            <label class="titulo" for="orientador">Orientador:</label>
            <select aria-label="Default select example" class="boxinfo" id="orientador" name="orientador">
                <option>Selecione um orientador</option>
                @foreach ($orientadores as $orientador)
                    <option value="{{$orientador->id}}">{{$orientador->user->name}}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label class="titulo" for="info_complementares">Informações complementares</label>
            <input type="text" id="info_complementares" class="boxinfo" name="info_complementares" placeholder="informações complementares" required>
            <br>
            <br>
            <br>
            <label class="titulo" for="termo_compromisso_aluno">termo_compromisso_aluno</label>
            <input type="file" id="termo_compromisso_aluno" class="boxinfo" name="termo_compromisso_aluno" required>
            <br>


            <div style="display: flex; align-content: center; align-items: center; justify-content: center; gap:5%">
                <input type="button" value="Voltar" href="{{ route('edital.index')}}" onclick="window.location.href='{{ route("edital.index")}}'" style="background: #2D3875;
                box-shadow: 4px 5px 7px rgba(0, 0, 0, 0.25); display: inline-block;
                border-radius: 13px; color: #FFFFFF; border: #2D3875; font-style: normal; font-weight: 400; font-size: 24px;
                line-height: 29px; text-align: center; padding: 5px 15px;">
                <input type="submit" value="Salvar" style="background: #34A853; box-shadow: 4px 5px 7px rgba(0, 0, 0, 0.25);
                display: inline-block; border-radius: 13px; color: #FFFFFF; border: #34A853; font-style: normal;
                font-weight: 400; font-size: 24px; line-height: 29px; text-align: center; padding: 5px 15px;">
            </div>
        </form>
    </div>
    <br>
    <br>
</div>

@endcan
@endsection
