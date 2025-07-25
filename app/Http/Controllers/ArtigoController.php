<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Comentario;
use App\Models\AcoesPost;
class ArtigoController extends Controller
{
    public function create()
    {
        try {
            $titulo = request('titulo');
            $conteudo = request('conteudo');
            $usuario_id = request('usuario_id');

            if (!$titulo || !$conteudo) {
                throw new \Exception("Título, conteúdo e ID do usuário são obrigatórios.");
            }

            $user = \Illuminate\Support\Facades\Auth::user();

            $artigo = Artigo::create([
                'titulo' => $titulo,
                'conteudo' => $conteudo,
                'usuario_id' => $user->id ?? 1, 
                'curtidas' => 0,
                'comentarios' => 0,
                'salvamentos' => 0
            ]);

            return response()->redirectTo("/artigo/$artigo->id");
        } catch (\Exception $e) {
            return response()->view("novo_artigo", [
                "artigo" => new Artigo(),
                "error" => "Erro ao criar artigo: " . $e->getMessage(),
                "usuario" => \Illuminate\Support\Facades\Auth::user()
            ]);
        }
    }

    public function read($id)
    {
        $artigo = Artigo::where('id', $id)->with('usuario:id,nome')->first();
        $artigo->comentarios = Comentario::where('artigo_id', $id)
            ->with('usuario:id,nome')
            ->get();
        $artigo->curtidas = AcoesPost::where('artigo_id', $id)
            ->where('acao', 'curtida')
            ->count();
        $artigo->salvamentos = AcoesPost::where('artigo_id', $id)
            ->where('acao', 'salvamento')
            ->count();
        return response()->view("artigo", ["artigo" => $artigo, "usuario" => \Illuminate\Support\Facades\Auth::user()]);
    }

    public function list()
    {
        $artigos = Artigo::all();
        return response()->view("home", ["artigos" => $artigos, "usuario" => \Illuminate\Support\Facades\Auth::user()]);
    }

    public function update($id)
    {
        try {
            $artigo = Artigo::find($id);

            if (!$artigo) {
                throw new \Exception("Artigo não encontrado.");
            }

            $artigo = $artigo->update([
                'titulo' => request('titulo'),
                'conteudo' => request('conteudo'),
            ]);

            return response()->redirectTo("/artigo/$id");
        } catch (\Exception $e) {
            return response()->view("novo_artigo", [
                "artigo" => Artigo::find($id),
                "error" => "Erro ao atualizar artigo: " . $e->getMessage(),
                "usuario" => \Illuminate\Support\Facades\Auth::user()
            ]);
        }
    }

    public function like($id)
    {
        try {
            $artigo = Artigo::find($id);

            if (!$artigo) {
                return response()->json(['message' => 'Artigo não encontrado'], 404);
            }

            if(AcoesPost::where('artigo_id', $id)
                ->where('usuario_id', \Illuminate\Support\Facades\Auth::user()->id)
                ->where('acao', 'curtida')
                ->exists()) {
                return response()->json(["success" => false, "message" => "Você já curtiu este artigo."], 400);
            }

            $acao = AcoesPost::create([
                'acao' => 'curtida',
                'artigo_id' => $id,
                'usuario_id' => \Illuminate\Support\Facades\Auth::user()->id
            ]);

            return response()->json(["success" => true, "message" => "Artigo curtido com sucesso."]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json(["success" => false, "message" => "Erro ao curtir o artigo: " . $th->getMessage()], 500);
        }
    }

    public function save($id)
    {
        try {
            $artigo = Artigo::find($id);

            if (!$artigo) {
                return response()->json(['message' => 'Artigo não encontrado'], 404);
            }

            if(AcoesPost::where('artigo_id', $id)
                ->where('usuario_id', \Illuminate\Support\Facades\Auth::user()->id)
                ->where('acao', 'salvamento')
                ->exists()) {
                return response()->json(["success" => false, "message" => "Você já salvou este artigo."], 400);
            }

            $acao = AcoesPost::create([
                'acao' => 'salvamento',
                'artigo_id' => $id,
                'usuario_id' => \Illuminate\Support\Facades\Auth::user()->id
            ]);

            return response()->json(["success" => true, "message" => "Artigo salvo com sucesso."]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json(["success" => false, "message" => "Erro ao salvar o artigo: " . $th->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        $artigo = Artigo::find($id);

        if (!$artigo) {
            return response()->json(['message' => 'Artigo não encontrado'], 404);
        }

        $artigo->delete();

        return response()->json(["success" => true, "message" => "Artigo excluído com sucesso."]);
    }

    public function updateForm($id)
    {
        $artigo = Artigo::find($id);

        return response()->view("novo_artigo", ["artigo" => $artigo, "usuario" => \Illuminate\Support\Facades\Auth::user()]);
    }

    public function createForm()
    {
        $artigo = new Artigo();
        $artigo->titulo = "";
        $artigo->conteudo = "";
        return response()->view("novo_artigo", ["artigo" => $artigo, "usuario" => \Illuminate\Support\Facades\Auth::user()]);
    }
}
