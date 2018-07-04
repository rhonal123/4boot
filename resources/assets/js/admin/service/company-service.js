"use strict"

const url ='/api/company';

class CompanyService {

  static index(search, page = 1, status = null ){
    let filter  = { page: page, search: search };
    if(status){
      filter.status = status;
    }
  	return axios.get(`${url}`,{ params: filter });
  }

  static get nuevas(search, page =1 ){
    return index(search,page,'ESPERA');
  }

  static get enProceso(search, page =1 ){
    return index(search,page,'EN-PROCESO');
  }

  static get aprobada(search, page =1 ){
    return index(search,page,'APROBADA');
  }

  static get rechazada(search, page =1 ){
    return index(search,page,'RECHAZADA');
  }

  static getById(id) {
    return axios.get(`${url}/${id}`);
  }

  static delete(id) {
    return axios.delete(`${url}/${id}`);
  }

  static save(data) {
    return axios.put(`${url}/${data.id}`,{
    	type: data.type,
      requeriments: data.requeriments,
    });
  }

}

module.exports = CompanyService;