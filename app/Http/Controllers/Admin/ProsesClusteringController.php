<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PusatCluster;
use App\DataGempa;
use App\Iterasi;
use App\NilaiCost;
use DB;
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
class ProsesClusteringController extends Controller
{
    public function pusatCluster(){
        $datas = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')->get();
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $max_min_1 = $max-1;
        $cost_awal = NilaiCost::select('nilai_cost')->where('iterasi_ke',$max_min_1)->first();
        $cost_akhir = NilaiCost::select('nilai_cost')->where('iterasi_ke',$max)->first();
        return view('admin/proses_cluster/pusat_cluster',compact('datas','max','max_cost','cost_awal','cost_akhir'));
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

    public function nilaiClusterSatu($max){
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $datas = Iterasi::join('data_gempas','data_gempas.id','iterasis.data_gempa_id')->select('kekuatan','kedalaman','nilai_cluster_1','iterasi_ke')->where('iterasi_ke',$max)->get();
        return view('admin/proses_cluster.nilai_cluster_1',compact('datas','max','max_cost'));
    }

    public function generateNilaiClusterSatu($max){
        $data_gempa = DataGempa::select('id','kedalaman','kekuatan')->get();
        $pusat_medoids = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')
                        ->select('iterasi_ke','kedalaman','kekuatan')
                        ->where('cluster_ke','1')
                        ->where('iterasi_ke',$max)
                        ->orderBy('iterasi_ke','desc')
                        ->first();
        $array = [];
        for ($i=0; $i <count($data_gempa) ; $i++) { 
                $hasil = pow(($data_gempa[$i]->kedalaman - $pusat_medoids->kedalaman),2) + pow(($data_gempa[$i]->kekuatan - $pusat_medoids->kekuatan),2);
                $array[] = [
                    'data_gempa_id' =>  $data_gempa[$i]->id,
                    'iterasi_ke'    =>  $pusat_medoids['iterasi_ke'],
                    'nilai_cluster_1'    =>  \sqrt($hasil),
                ];
        }
        // return $array;
        Iterasi::insert($array);
        return \redirect()->route('admin.proses_clustering.nilai_cluster_satu',[$max])->with(['success'   =>  'Nilai Cluster 1 Berhasil Digenerate !!']);
    }

    public function nilaiClusterDua($max){
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $datas = Iterasi::join('data_gempas','data_gempas.id','iterasis.data_gempa_id')->select('kekuatan','kedalaman','nilai_cluster_2','iterasi_ke')->where('iterasi_ke',$max)->get();
        return view('admin/proses_cluster.nilai_cluster_2',compact('datas','max','max_cost'));
    }

    public function generateNilaiClusterDua($max){
        $data_gempa = DataGempa::select('id','kedalaman','kekuatan')->get();
        $pusat_medoids = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')
                        ->select('iterasi_ke','kedalaman','kekuatan')
                        ->where('cluster_ke','2')
                        ->where('iterasi_ke',$max)
                        ->orderBy('iterasi_ke','desc')
                        ->first();
        $array = [];
        for ($i=0; $i <count($data_gempa) ; $i++) { 
                $hasil = pow(($data_gempa[$i]->kedalaman - $pusat_medoids->kedalaman),2) + pow(($data_gempa[$i]->kekuatan - $pusat_medoids->kekuatan),2);
                Iterasi::where('data_gempa_id',$data_gempa[$i]->id)->update([
                    'data_gempa_id' =>  $data_gempa[$i]->id,
                    'iterasi_ke'    =>  $pusat_medoids['iterasi_ke'],
                    'nilai_cluster_2'    =>  \sqrt($hasil),
                ]);
        }
        return \redirect()->route('admin.proses_clustering.nilai_cluster_dua',[$max])->with(['success'   =>  'Nilai Cluster 2 Berhasil Digenerate !!']);
    }

    public function nilaiClusterTiga($max){
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $datas = Iterasi::join('data_gempas','data_gempas.id','iterasis.data_gempa_id')->select('kekuatan','kedalaman','nilai_cluster_3','iterasi_ke')->where('iterasi_ke',$max)->get();
        return view('admin/proses_cluster.nilai_cluster_3',compact('datas','max','max_cost'));
    }

    public function generateNilaiClusterTiga($max){
        $data_gempa = DataGempa::select('id','kedalaman','kekuatan')->get();
        $pusat_medoids = PusatCluster::join('data_gempas','data_gempas.id','pusat_clusters.data_gempa_id')
                        ->select('iterasi_ke','kedalaman','kekuatan')
                        ->where('cluster_ke','3')
                        ->where('iterasi_ke',$max)
                        ->orderBy('iterasi_ke','desc')
                        ->first();
        $array = [];
        for ($i=0; $i <count($data_gempa) ; $i++) { 
                $hasil = pow(($data_gempa[$i]->kedalaman - $pusat_medoids->kedalaman),2) + pow(($data_gempa[$i]->kekuatan - $pusat_medoids->kekuatan),2);
                Iterasi::where('data_gempa_id',$data_gempa[$i]->id)->update([
                    'data_gempa_id' =>  $data_gempa[$i]->id,
                    'iterasi_ke'    =>  $pusat_medoids['iterasi_ke'],
                    'nilai_cluster_3'    =>  \sqrt($hasil),
                ]);
        }
        return \redirect()->route('admin.proses_clustering.nilai_cluster_tiga',[$max])->with(['success'   =>  'Nilai Cluster 3 Berhasil Digenerate !!']);
    }

    public function nilaiMin($max){
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $datas = Iterasi::join('data_gempas','data_gempas.id','iterasis.data_gempa_id')->select('kekuatan','kedalaman','nilai_cluster_1','nilai_cluster_2','nilai_cluster_3','iterasi_ke','nilai_min')->where('iterasi_ke',$max)->get();
        return view('admin/proses_cluster.nilai_min',compact('datas','max','max_cost'));
    }

    public function generateNilaiMin($max){
        $datas = Iterasi::select('id','nilai_cluster_1','nilai_cluster_2','nilai_cluster_3')->where('iterasi_ke',$max)->get();
        for ($i=0; $i < count($datas); $i++) { 
            $a =   [
                $array[0] = $datas[$i]->nilai_cluster_1,
                $array[1] = $datas[$i]->nilai_cluster_2,
                $array[2] = $datas[$i]->nilai_cluster_3,
            ];
            Iterasi::where('id',$datas[$i]->id)->update([
                'nilai_min' =>  min($a),
            ]);
        }
        return \redirect()->route('admin.proses_clustering.nilai_min',[$max])->with(['success'   =>  'Nilai Minimun Berhasil Digenerate !!']);
    }

    public function cluster($max){
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        $datas = Iterasi::join('data_gempas','data_gempas.id','iterasis.data_gempa_id')
                        ->select('nilai_cluster_1','nilai_cluster_2','nilai_cluster_3','iterasi_ke','nilai_min','kelompok_cluster')
                        ->where('iterasi_ke',$max)
                        ->get();
        return view('admin/proses_cluster.cluster',compact('datas','max','max_cost'));
    }

    public function generateCluster($max){
        $datas = Iterasi::select('id','nilai_min')->where('iterasi_ke',$max)->get();
        $array = [];
        for ($i=0; $i <count($datas) ; $i++) { 
            $data2 = Iterasi::select('id','nilai_cluster_1','nilai_cluster_2','nilai_cluster_3')->where('id',$datas[$i]->id)->get();
            for ($a=0; $a <count($data2) ; $a++) { 
                if ($datas[$i]->nilai_min == $data2[$a]->nilai_cluster_1) {
                    Iterasi::where('id',$datas[$i]->id)->update([
                        'kelompok_cluster'  =>  '1',
                    ]); 
                }
                elseif ($datas[$i]->nilai_min == $data2[$a]->nilai_cluster_2) {
                    Iterasi::where('id',$datas[$i]->id)->update([
                        'kelompok_cluster'  =>  '2',
                    ]); 
                }
                elseif ($datas[$i]->nilai_min == $data2[$a]->nilai_cluster_3) {
                    Iterasi::where('id',$datas[$i]->id)->update([
                        'kelompok_cluster'  =>  '3',
                    ]); 
                }
            }
        }
        return \redirect()->route('admin.proses_clustering.cluster',[$max])->with(['success'   =>  'Kelompok Cluster Berhasil Digenerate !!']);
    }

    public function jumlahCost($max){
        $datas = NilaiCost::where('iterasi_ke',$max)->get();
        $max = PusatCluster::max('iterasi_ke');
        $max_cost = NilaiCost::max('iterasi_ke');
        return view('admin/proses_cluster.nilai_cost',compact('datas','max','max_cost'));
    }

    public function generateNilaiCost($max){
        $datas = Iterasi::select(DB::raw('SUM(nilai_min) as nilai_cost'))->where('iterasi_ke',$max)->get();
        // return $datas;
        $nilai = new NilaiCost;
        $nilai->iterasi_ke = $max;
        $nilai->nilai_cost = $datas[0]->nilai_cost;
        $nilai->save();
        return \redirect()->route('admin.proses_clustering.jumlah_cost',[$max])->with(['success'   =>  'Nilai Cost Berhasil Digenerate !!']);
    }
}