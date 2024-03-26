<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class geradorQrcodeController extends Controller
{
    public function index()
    {
        return Inertia::render('QrCode/Index');
    }

    public function gerarQrCode(Request $request)
    {
        $qrCode = QrCode::size(200)
            ->generate(
                $request->qrCode,
            );

        return response($qrCode);
    }
}
