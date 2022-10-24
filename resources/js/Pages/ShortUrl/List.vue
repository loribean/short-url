<script setup>
import Layout from '@/Shared/Layout.vue'
import Icon from '@/Shared/Icon.vue'
import Pagination from '@/Shared/Pagination.vue'
import { Head, Link} from '@inertiajs/inertia-vue3';
const props = defineProps(['short_urls']);
</script>

<template>
    <Layout>
      <div>
        <Head title="Short Urls" />
    <h1 class="mb-8 text-3xl font-bold">Short Urls</h1>
    <div class="flex items-center justify-between mb-6">
      <Link class="btn-indigo" href="/short_url">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Short Url</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">ID</th>
            <th class="pb-4 pt-6 px-6">Slug</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Destination URL</th>
          </tr>
        </thead>
        <tbody>

          <tr v-for="short_url in short_urls.data" :key="short_url.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/short_urls/${short_url.id}/edit`">
                {{ short_url.id }}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/short_urls/${short_url.id}/edit`" tabindex="-1">
                {{ short_url.slug}}
              </Link>
            </td>
            <td class="border-t">
              <Link class="flex items-center px-6 py-4" :href="`/short_urls/${short_url.id}/edit`" tabindex="-1">
                {{ short_url.destination_url }}
              </Link>
            </td>
            <td class="w-px border-t">
              <Link class="flex items-center px-4" :href="`/short_urls/${short_url.id}/edit`" tabindex="-1">
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td>
          </tr>
          <tr v-if="short_urls.data.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No short_urls found.</td>
          </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="short_urls.links" />
  </div>
</Layout>
</template>
