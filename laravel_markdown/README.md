#마크다운 뷰어  
#### 
###파일 읽기(20/11/09)  
파일 존재 여부 확인 후 존재하지 않을 시 404  
존재하면 base_path 메소드를 이용하여 해당 파일 읽어들임  
web.php에서 app으로 파서 호출 및 text 메소드를 이용하여 문서 내용 컴파일  

    $text = (new App\Models\Document)->get($file);
    
    return app(ParsedownExtra::class)->text($text);

