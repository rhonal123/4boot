"use strict"

class IncidenceService {

  static getById(id) {
    return axios.get('http://localhost:8000/api/incidence-type/'+ id);
  }

  static save(data) {
  	console.log("............:>>>",data);
  	if(data.id){
	    return axios.put('http://localhost:8000/api/incidence-type/'+ data.id,{
	    	type: data.type
	    });
	}
	else{
	    return axios.post('http://localhost:8000/api/incidence-type',{
	    	type: data.type
	    });
	}
  }

}

module.exports = IncidenceService;