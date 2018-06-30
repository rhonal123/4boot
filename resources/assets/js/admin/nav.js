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
        }
      ]
    },
    {
      name: 'Atención al cliente',
      url: '/components/tables',
      icon: 'fa fa-table',
      children: [
        { 
          name: 'Preguntas',
          url: '/question',
          icon: 'fa fa-pencil-square-o',
          badge: {
            variant: 'warning',
            text: '48 NEW'
          }
       }
     ]
    }
  ]
}
