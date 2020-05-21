<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PusatCluster;
use App\DataGempa;
use App\Iterasi;
use DB;
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
class ProsesClusteringController extends Controller
{
    public function pusatCluster(){
        $datas = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')->get();
        return view('admin/proses_cluster/pusat_cluster',compact('datas'));
    }

    public function generatePusatCluster(){
        $data_gempa = DataGempa::inRandomOrder()->select('id')->take(3)->get();
        $max_cluster = PusatCluster::max('iterasi_ke');
        for ($i=0; $i <count($data_gempa) ; $i++) { 
            if (empty($max_cluster)) {
                $post = new PusatCluster;
                $post->iterasi_ke = '1';
                $post->cluster_ke = $i+1;
                $post->data_gempa_id = $data_gempa[$i]->id;
                $post->save();
            }
            else{
                $post = new PusatCluster;
                $post->iterasi_ke = $max_cluster+1;
                $post->cluster_ke = $i+1;
                $post->data_gempa_id = $data_gempa[$i]->id;
                $post->save();
            }
        }
        return redirect()->route('admin.proses_clustering')->with(['success'    =>  'Pusat Cluster Berhasil Digenerat !!']);
    }

    public function nilaiClusterSatu(){
        $pusat_medoids = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')
                        ->select('iterasi_ke','kedalaman','kekuatan')
                        ->where('cluster_ke','1')
                        ->orderBy('iterasi_ke','desc')
                        ->get();
        return view('admin/proses_cluster.nilai_cluster_1',compact('pusat_medoids'));
    }

    public function generateNilaiClusterSatu(){
        $data_gempa = DataGempa::select('id','kedalaman','kekuatan')->get();
        $pusat_medoids = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')
                        ->select('iterasi_ke','kedalaman','kekuatan')
                        ->where('cluster_ke','1')
                        ->orderBy('iterasi_ke','desc')
                        ->first();
        $array = [];
        for ($i=0; $i <count($data_gempa) ; $i++) { 
                $array[] = [
                    'iterasi_ke'    =>  $pusat_medoids['iterasi_ke'],
                    'nilai_cluster_1'    =>  ($data_gempa[$i]->kedalaman - $pusat_medoids->kedalaman) + ($data_gempa[$i]->kekuatan - $pusat_medoids->kekuatan),
                ];  
        }
        Iterasi::insert($array);
        return \redirect()->route('admin.proses_clustering.nilai_cluster_satu')->with(['success'   =>  'Nilai Cluster 1 Berhasil Digenerate !!']);
    }

}
