<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvitationController extends Controller
{
    // Lista todos os convites
    public function index()
    {
        $invitations = Invitation::all();
        return response()->json($invitations);
    }

    // Exibe um convite específico por ID
    public function show($id)
    {
        $invitation = Invitation::find($id);

        if (!$invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }

        return response()->json($invitation);
    }

    // Cria um novo convite
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dream_id' => 'required|integer|exists:dreams,id',
            'user_id' => 'required|integer|exists:users,id',
            'invitee_email' => 'required|email',
            'qr_code' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $invitation = Invitation::create($request->all());

        return response()->json($invitation, 201);
    }

    // Atualiza um convite existente
    public function update(Request $request, $id)
    {
        $invitation = Invitation::find($id);

        if (!$invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'dream_id' => 'integer|exists:dreams,id',
            'user_id' => 'integer|exists:users,id',
            'invitee_email' => 'email',
            'qr_code' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $invitation->update($request->all());

        return response()->json($invitation);
    }

    // Exclui um convite
    public function destroy($id)
    {
        $invitation = Invitation::find($id);

        if (!$invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }

        $invitation->delete();

        return response()->json(['message' => 'Invitation deleted successfully']);
    }
}
