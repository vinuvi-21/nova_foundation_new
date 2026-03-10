import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-star-rating-field', IndexField)
  app.component('detail-star-rating-field', DetailField)
  app.component('form-star-rating-field', FormField)
})
