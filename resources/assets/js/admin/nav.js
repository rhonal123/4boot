export default {
  items: [
    {
      name: 'Dashboard',
      url: '/',
      icon: 'fa fa-dashboard',
      badge: {
        variant:'success',
        text: 'NEW'
      }
    },
    /*{
      title: true,
      name: 'UI elements',
      class: '',
      wrapper: {
        element: '',
        attributes: {}
      }
    },*/
    {
      name: 'Configuración',
      url: '/components',
      icon: 'fa fa-puzzle-piece',
      children: [
        {
          name: 'Tipo de Incidencias',
          url: '/incidence-type',
          icon: 'fa fa-puzzle-piece',
        },
        {
          name: 'Tipo de Empresas',
          url: '/company-type',
          icon: 'fa fa-id-badge',
        },
        {
          name: 'Tipo Documento',
          url: '/document-type',
          icon: 'fa fa-id-badge',
        },
        {
          name: 'Tipo de Requerimiento',
          url: '/requeriment-type',
          icon: 'fa fa-id-badge',
        },
        {
          name: 'Requerimiento',
          url: '/requeriment',
          icon: 'fa fa-id-badge',
        }
      ]
    },
    {
      name: 'Empresas',
      url: '/companies',
      icon: 'fa fa-table',
      children: [
        { 
          name: 'Nuevos',
          url: '/companies/news',
          icon: 'fa fa-pencil-square-o'
//          badge: {
//            variant: 'warning',
//            text: '48 NEW'
//          }
        },
        { 
          name: 'En Proceso',
          url: '/companies/enproceso',
          icon: 'fa fa-pencil-square-o',
//          badge: {
//            variant: 'info',
//            text: '48'
//          }
       },
       { 
        name: 'Rechazadas',
        url: '/companies/rechazada',
        icon: 'fa fa-pencil-square-o',
//        badge: {
//          variant: 'info',
//          text: '1'
//        }
     },
       { 
          name: 'Aprobadas',
          url: '/companies/aprobadas',
          icon: 'fa fa-pencil-square-o',
//          badge: {
//            variant: 'info',
//            text: '48'
//          }
       }
     ]
    },
    {
      name: 'Documentos',
      url: '/components/tables',
      icon: 'fa fa-table',
      children: [
        { 
          name: 'Nuevos',
          url: '/question',
          icon: 'fa fa-pencil-square-o',
//          badge: {
//            variant: 'warning',
//            text: '48 NEW'
//          }
        },
        { 
          name: 'Historico',
          url: '/question',
          icon: 'fa fa-pencil-square-o',
//          badge: {
//            variant: 'warning',
//            text: '48 NEW'
//          }
        }
      ]
    },
    {
      name: 'Atención al cliente',
      url: '/components/tables',
      icon: 'fa fa-users',
      children: [
        { 
          name: 'Preguntas',
          url: '/question',
          icon: 'fa fa-pencil-square-o',
//          badge: {
//            variant: 'warning',
//            text: '48 NEW'
//          }
       }
     ]
    },
    {
      name: 'Reportes',
      url: '/components/tables',
      icon: 'fa fa-bar-chart',
      children: [
        { 
       }
     ]
    },
    {
      name: 'Administracion del Sistema',
      url: '/components/tables',
      icon: 'fa fa-cogs',
      children: [
      { 
        name: 'Seguridad',
        icon: 'fa fa-lock',
        children:[
          {name: 'Rol', url: 'roles'},
          {name: 'Usuario', url: 'usuarios'}
        ]
      }
     ]
    }

  ]
}