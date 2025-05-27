<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Comentario;

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

            $artigo = Artigo::create([
                'titulo' => $titulo,
                'conteudo' => $conteudo,
                'usuario_id' => 1,
                'curtidas' => 0,
                'comentarios' => 0,
                'salvamentos' => 0
            ]);

            return response()->redirectTo("/artigo/$artigo->id");
        } catch (\Exception $e) {
            return response()->view("novo_artigo", [
                "artigo" => new Artigo(),
                "error" => "Erro ao criar artigo: " . $e->getMessage()
            ]);
        }
    }

    public function read($id)
    {
        $artigo = Artigo::where('id', $id)->with('usuario:id,nome')->first();
        $artigo->comentarios = Comentario::where('artigo_id', $id)
            ->with('usuario:id,nome')
            ->get();
        return response()->view("artigo", ["artigo" => $artigo]);
    }

    public function list()
    {
        $artigos = Artigo::all();
        return response()->view("home", ["artigos" => $artigos]);
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
                'usuario_id' => 1
            ]);

            return response()->redirectTo("/artigo/$id");
        } catch (\Exception $e) {
            return response()->view("novo_artigo", [
                "artigo" => Artigo::find($id),
                "error" => "Erro ao atualizar artigo: " . $e->getMessage()
            ]);
        }
    }

    public function like($id)
    {
        $artigo = Artigo::find($id);

        if (!$artigo) {
            return response()->json(['message' => 'Artigo não encontrado'], 404);
        }

        $artigo->increment('curtidas');

        return response()->json(["success" => true, "message" => "Artigo curtido com sucesso."]);
    }

    public function save($id)
    {
        $artigo = Artigo::find($id);

        if (!$artigo) {
            return response()->json(['message' => 'Artigo não encontrado'], 404);
        }

        $artigo->increment('salvamentos');

        return response()->json(["success" => true, "message" => "Artigo salvo com sucesso."]);
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

        return response()->view("novo_artigo", ["artigo" => $artigo]);
    }

    public function createForm()
    {
        $artigo = new Artigo();
        $artigo->titulo = "";
        $artigo->conteudo = "";
        return response()->view("novo_artigo", ["artigo" => $artigo]);
    }
}
