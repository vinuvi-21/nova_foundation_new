import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-image-preview-field', IndexField)
  app.component('detail-image-preview-field', DetailField)
  app.component('form-image-preview-field', FormField)
})
