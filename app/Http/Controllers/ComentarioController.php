<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function update(Request $request, $id)
    {
        $comentario = \App\Models\Comentario::findOrFail($id);
        $comentario->texto = $request->input('conteudo');
        $comentario->save();

        return response()->json(["success" => true, "comentario" => $comentario]);
    }

    public function comment($id, Request $request)
    {
        $comentario = $request->input('conteudo');

        if (empty($comentario)) {
            return response()->view("artigo", [
                "artigo" => Artigo::findOrFail($id),
                "error" => "Comentário não pode ser vazio"
            ]);
        }

        if (strlen($comentario) > 255) {
            return response()->view("artigo", [
                "artigo" => Artigo::findOrFail($id),
                "error" => "Comentário muito longo"
            ]);
        }
        if (strlen($comentario) < 5) {
            return response()->view("artigo", [
                "artigo" => Artigo::findOrFail($id),
                "error" => "Comentário muito curto"
            ]);
        }
        $comentario = Comentario::create([
            'artigo_id' => $id,
            'usuario_id' => 1,
            'conteudo' => $comentario
        ]);
        $artigo = Artigo::findOrFail($id);
        $artigo->increment('comentarios');
        $artigo->save();
        return redirect("/artigo/$id");
    }

    public function destroy($id)
    {
        $comentario = \App\Models\Comentario::findOrFail($id);
        $comentario->delete();

        return response()->json(["success" => true, "message" => "Comentário deletado com sucesso"]);
    }
}
