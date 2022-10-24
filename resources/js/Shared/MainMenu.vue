<template>
    <div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/">
          <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('/') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('/') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
        </Link>
      </div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/short_urls">
          <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('/short_urls') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('/short_urls') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Smol URLs</div>
        </Link>
      </div>
      <div class="mb-4">
        <Link class="group flex items-center py-3" href="/reports">
          <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('reports') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Reports</div>
        </Link>
      </div>
    </div>
  </template>

  <script>
  import { Link } from '@inertiajs/inertia-vue3'
  import Icon from '@/Shared/Icon.vue'

  export default {
    components: {
      Icon,
      Link,
    },
    methods: {
      isUrl(...urls) {
        let currentUrl = this.$page.url.substr(1)
        if (urls[0] === '') {
          return currentUrl === ''
        }
        return urls.filter((url) => currentUrl.startsWith(url)).length
      },
    },
  }
  </script>
