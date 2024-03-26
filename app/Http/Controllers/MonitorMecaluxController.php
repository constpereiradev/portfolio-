<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MonitorMecaluxController extends Controller
{
    public function index(){
     
            $sql = "SELECT
            ISNULL(CAST(CAST(ZF9_REQORI AS VARBINARY(8000)) AS VARCHAR(8000)),'') as ORIGEM ,
            ISNULL(CAST(CAST(ZF9_RESULT AS VARBINARY(8000)) AS VARCHAR(8000)),'') as RESULTADO,
                CASE WHEN ZF9_ROTORI LIKE '%mtdContainerForASNErpCommandClient%' then 'APONTAMENTO ASN'
                    WHEN ZF9_ROTORI LIKE '%mtdStartWorkflowErpCommandClient%' then 'ETIQUETA ROBOPAC'
                    WHEN ZF9_ROTORI LIKE '%mtdOutboundOrderErpCommandClient%' then 'PEDIDO DE VENDA'
                    WHEN ZF9_ROTORI LIKE '%mtdEfetivarPedidoVendasProtheusSOF%' then 'EFETIVA PEDIDO DE VENDA'
                    WHEN ZF9_ROTORI LIKE '%mtdTransferenciaInterna%' then 'TRANSFERÊNCIA'
                    WHEN ZF9_ROTORI LIKE '%mtdEfetivarSolicitacaoTranserencia%' then 'EFETIVA TRANSFERÊNCIA'
                    WHEN ZF9_ROTORI LIKE '%mtdProductErpCommandClient%' then 'CAD. PRODUTO'
                    WHEN ZF9_ROTORI LIKE '%mtdAgencyErpCommandClient%' then 'CAD. CLI/TRANSP.'
                                                                
                ELSE ZF9_REQORI END as 'INTERFACE',
                ZF9_DATA as 'DATA',
                ZF9_HORA as 'HORA'
            FROM
                P12OFICIAL.dbo.ZF9010
            WHERE
            ZF9_DATA >='20231001' AND ZF9_STATUS<>'S'
            ";

        $dados = DB::connection('protheus')->select($sql);
            
        return Inertia::render('MonitorMecalux/MonitorMecalux', [
            'dados' => $dados,
        ]);
    }
    
    public function busca(Request $request){

        $sql = "SELECT
        ISNULL(CAST(CAST(ZF9_REQORI AS VARBINARY(8000)) AS VARCHAR(8000)),'') as ORIGEM ,
        ISNULL(CAST(CAST(ZF9_RESULT AS VARBINARY(8000)) AS VARCHAR(8000)),'') as RESULTADO,
            CASE WHEN ZF9_ROTORI LIKE '%mtdContainerForASNErpCommandClient%' then 'APONTAMENTO ASN'
                WHEN ZF9_ROTORI LIKE '%mtdStartWorkflowErpCommandClient%' then 'ETIQUETA ROBOPAC'
                WHEN ZF9_ROTORI LIKE '%mtdOutboundOrderErpCommandClient%' then 'PEDIDO DE VENDA'
                WHEN ZF9_ROTORI LIKE '%mtdEfetivarPedidoVendasProtheusSOF%' then 'EFETIVA PEDIDO DE VENDA'
                WHEN ZF9_ROTORI LIKE '%mtdTransferenciaInterna%' then 'TRANSFERÊNCIA'
                WHEN ZF9_ROTORI LIKE '%mtdEfetivarSolicitacaoTranserencia%' then 'EFETIVA TRANSFERÊNCIA'
                WHEN ZF9_ROTORI LIKE '%mtdProductErpCommandClient%' then 'CAD. PRODUTO'
                WHEN ZF9_ROTORI LIKE '%mtdAgencyErpCommandClient%' then 'CAD. CLI/TRANSP.'
                                                            
            ELSE ZF9_REQORI END as 'INTERFACE',
            ZF9_DATA as 'DATA',
            ZF9_HORA as 'HORA'
        FROM
            P12OFICIAL.dbo.ZF9010
        WHERE
        ZF9_DATA >='20231001' AND ZF9_STATUS<>'S'
        ";
       
        $dadosBusca = DB::connection('protheus')->select($sql);

        

         
    }

    
}
