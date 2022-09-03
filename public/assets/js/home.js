// window.axios = require('axios');

$(function(){
    //current month data...
    var month_data=[];
    var all_writer=[];
    var [total_table_item,total_quran,total_hadis,total_nobel,total_story,total_poem]=[0,0,0,0,0,0];
    var [current_table_postion,current_quran,current_hadis,current_nobel,current_story,current_poem]=[16,4,4,4,4,4];
    var [show_data,data_quran,data_hadis,data_nobel,data_story,data_poem]=[[],[],[],[],[],[]];
    month={'01':'জানুয়ারি','02':'ফেব্রুয়ারি','03':'মার্চ','04':'এপ্রিল','05':'মে','06':'জুন','07':'জুলাই','08':'আগস্ট','09':'সেপ্টেম্বর','10':'অক্টোবর','11':'নভেম্বর','12':'ডিসেম্বর'};
   var append_writer_data = (text) =>{
        $("#writer_list").html('');
        var filter_list = all_writer;
        var length = Math.min(20,filter_list.length);
        if(text != ''){
            filter_list = all_writer.filter(word => word[0].match(text));
            length = Math.min(20,filter_list.length);
        }
        for(i=0;i<length;i++)
            {
                $("#writer_list").append(
                    `<a href="/writer-kishorkantha${filter_list[i][1]}" class='writer_link'>
                    <div class="img_div">
                        <img src="${filter_list[i][2]}" alt='user'/>
                    </div>
                    <div>
                        <p>${filter_list[i][0]}</p>
                        <small>${filter_list[i][3]}</small>
                    </div>
                </a>`
                );
            }
   }
   $("#search_writer").on('keyup',function(event){
    append_writer_data(event.target.value);
   });
    //get all-wirter data....
    axios.get('/all-writer').then(resp => {
    data=resp.data;
    data.forEach(element => {
            all_writer.push([element.name,element.slug,element.image,element.count_write]);
        });
    });

    //current month table append data
    var table_append_row = (first_index) =>{
        $("#last_month_tbody").html('');
        for(i=first_index;i<first_index+8;i++)
        {
            j=i+8;
           $("#last_month_tbody").append(`<tr>
                <td class="topic_title">${show_data[i%total_table_item][3]}</td>
                <td class="topic_description">
                    <a href="/post${show_data[i%total_table_item][1]}">
                        <p>${show_data[i%total_table_item][0]}</p>
                        <small>${show_data[i%total_table_item][2]}</small>
                    </a>
                </td>
                <td class="topic_title">${show_data[j%total_table_item][3]}</td>
                <td class="topic_description">
                    <a href="/post${show_data[j%total_table_item][1]}">
                        <p>${show_data[j%total_table_item][0]}</p>
                        <small>${show_data[j%total_table_item][2]}</small>
                    </a>
                </td>
            </tr>`);
        }
    }
    //get current month table data 
    axios.get('/last-month-data').then(resp => {
        month_data=resp.data;
        current_table_postion=16;
        var ini_date=month_data[0].date;
        month_data.forEach(element => {
            
            if(element.date==ini_date){
                writer_name = '';
                
                if(element.writer != null)
                {
                    writer_name=element.writer.name;
                }
                show_data.push([element.title,element.slug,writer_name,element.category.name]);
                total_table_item++;
            }
        });
        table_append_row(0);
    });
    $("#updateLastMonthLeft").on("click",function(){
        if( current_table_postion > 16){
            current_table_postion-=16;
            table_append_row(current_table_postion);
        }
    });   
    $("#updateLastMonthRight").on("click",function(){
        if( current_table_postion < total_table_item){
            current_table_postion+=16;
            table_append_row(current_table_postion);
        }
    });
    //for all quran,hadis,nobel,poem
    var content_append_row = (id,total,array,first_index) =>{
        $("#"+id).html('');
        for(i=first_index;i<first_index+4;i++)
        {
           $("#"+id).append(
            `<a href="/post${array[i%total][1]}" class="img_link">
                <img src="${(array[i%total][4]=='')? 'assets/img/'+id+'_image.png': array[i%total][4] }" alt="${array[i%total][0]}">
                <div class="image_head" style="background-color:#2e32bb9b;">
                    <div class="image_title">
                        <p>${array[i%total][0]}</p>
                        <p>${array[i%total][2]}</p>
                        <p>${array[i%total][3]}</p>
                    </div>
                </div>
            </a>`);
        }
    }
    //for all quran,hadis,nobel,poem
    var content_category_data = (id,total,array,category)=>{
        var url='/post-data/'+category;
        axios.get(url).then(resp => {
            var all_data=resp.data;
            all_data.forEach(element => {
                    writer_name = '';
                    if(element.writer != null)
                    {
                        writer_name=element.writer.name;
                    }
                    array.push([element.title,element.slug,writer_name,element.date_title,element.image]);
                    total++;
            });
            content_append_row(id,total,array,0);
        });
        return array;   
    }

    //Quran fetch data.....
    data_quran=content_category_data('quran_div',total_quran,data_quran,'কুরআনের-আলো');
    $("#updateQuranLeft").on("click",function(){
        if( current_quran > 4){
            current_quran-=4; 
           content_append_row('quran_div',data_quran.length,data_quran,current_quran);
        }
    });   
    $("#updateQuranRight").on("click",function(){
        if( current_quran < data_quran.length){
            current_quran+=4;
           content_append_row('quran_div',data_quran.length,data_quran,current_quran);
        }
    });
    //Hadis fetch data.....
    data_hadis=content_category_data('hadis_div',total_hadis,data_hadis,'হাদীসের-আলো');
    $("#updateHadisLeft").on("click",function(){
        if( current_hadis > 4){
            current_hadis-=4; 
           content_append_row('hadis_div',data_hadis.length,data_hadis,current_hadis);
        }
    });   
    $("#updateHadisRight").on("click",function(){
        if( current_hadis < data_hadis.length){
            current_hadis+=4;
           content_append_row('hadis_div',data_hadis.length,data_hadis,current_hadis);
        }
    });
    //nobel fetch data.....
    data_nobel=content_category_data('nobel_div',total_nobel,data_nobel,'উপন্যাস');
    $("#updateNobelLeft").on("click",function(){
        if( current_nobel > 4){
            current_nobel-=4; 
           content_append_row('nobel_div',data_nobel.length,data_nobel,current_nobel);
        }
    });   
    $("#updateNobelRight").on("click",function(){
        if( current_nobel < data_nobel.length){
            current_nobel+=4;
           content_append_row('nobel_div',data_nobel.length,data_nobel,current_nobel);
        }
    });
    //story fetch data.....
    data_story=content_category_data('story_div',total_story,data_story,'গল্প');
    $("#updateStoryLeft").on("click",function(){
        if( current_story > 4){
            current_story-=4; 
           content_append_row('story_div',data_story.length,data_story,current_story);
        }
    });   
    $("#updateStoryRight").on("click",function(){
        if( current_story < data_story.length){
            current_story+=4;
           content_append_row('story_div',data_story.length,data_story,current_story);
        }
    });
    //poem fetch data.....
    data_poem=content_category_data('poem_div',total_poem,data_poem,'কবিতা');
    $("#updatePoemLeft").on("click",function(){
        if( current_poem > 4){
            current_poem-=4; 
           content_append_row('poem_div',data_poem.length,data_poem,current_poem);
        }
    });   
    $("#updatePoemRight").on("click",function(){
        if( current_poem < data_poem.length){
            current_poem+=4;
           content_append_row('poem_div',data_poem.length,data_poem,current_poem);
        }
    });
});
