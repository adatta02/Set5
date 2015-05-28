function parsefile(fileBody){
	var k = 0;

	//array of characters
	var filearray = fileBody.split("\n");
	//console.log(filearray.length);
	
	var processedNumbers = [];		
	for(var i = 0; i < filearray.length &&  i < 12; i+=4){
		var l = filearray.slice(i, i+3);		
		var num = single_number(l);		
		processedNumbers.push(num);		
		
	}	
	
	console.log( processedNumbers );
	
	// get_lines(filearray);
	// single_number(filearray);
}

function get_lines(a){
	//console.log(a[4][1]);
	//var index = 0;
	var max_row = a.length;
	var max_col = a[0].length;
	//console.log(a.length);

	for(i = -1; i < max_row; i += 4) {
    	for(j = -1; j < max_col; j += 3) {

    		//create temporary number array
    		var s = new Array(3);
			for (var i = 0; i < 3; i++) {
    			s[i] = new Array(3);
    		}

        	for(k = 0; k < 3; k++) {
            	for(m = 0; m < 3; m++) {
                	s[k][m] == a[i + k + 1][j + m + 1];
                	console.log(a[0][1]);
                	console.log(s[0][1]);
            	}
        	}
        	generate_number(s);
    	}
    	//console.log(s[]);
    	//single_number(s);
	}
}

function single_number(a){
	//console.log(a);
	var index = 0;
	var cur_row = 0;
	var cur_col = 0;

	var max_row = a.length;
	var max_col = a[0].length;
	
	var returnNum = "";
	
	while(index < max_col){
		cur_col = index;
		cur_row = 0;
		
		//temporary 2d array to get 3x3 array
		var s = new Array(3);
		for (var i = 0; i < 3; i++) {
    		s[i] = new Array(3);
    	}

    	for(var r = 0; r < 3; r ++){
			for(var c = 0; c < 3; c++){
				s[r][c] = a[r][cur_col];
				cur_col ++;
			}
			cur_row ++;
			cur_col = index;
		}

		// now that you have the 3x3 find what number it represents
		index += 3;
		
		var n = generate_number(s);
		returnNum += n;  		
  	}
  	
  	return returnNum;
}

function generate_number(s){
	var underscore = 0;
	var upright = 0;
	var machinenumbers = null;

	for(var r = 0; r < 3; r ++){
			for(var c = 0; c < 3; c++){
				if(s[r][c] == "_"){
					underscore ++;
				}
				else if( s[r][c] == "|"){
					upright++;
				}

			}
	}

	if((underscore == 2) && (upright == 4)){
		machinenumbers = 0;
	}
	else if((underscore == 0) && (upright == 2)){
		machinenumbers = 1;
	}
	else if((underscore == 1) && (upright == 3)){
		machinenumbers = 4;
	}
	else if((underscore == 3) && (upright == 3)){
		machinenumbers = 6;
	}
	else if((underscore == 1) && (upright == 2)){
		machinenumbers = 7;
	}
	else if((underscore == 3) && (upright == 4)){
		machinenumbers = 8;
	}
	else if((underscore == 3) && (upright == 2)){
		if(s[1][2] == "|" && s[2][2] == "|"){
			machinenumbers = 3;
		}
		if(s[1][0] == "|" && s[2][2] == "|"){
			machinenumbers = 5;
		}
		if(s[1][2] == "|" && s[2][0] == "|"){
			machinenumbers = 2;
		}
	}

	return machinenumbers;
}
