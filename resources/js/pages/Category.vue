<template>
    <div>
        <h1>Category</h1>
    </div>
</template>

<script>
export default {
    name: 'Category',
    data() {
        return {
            categories: []
        }
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/v1/categories', {
            headers: {
                'Accept': 'application/json',
                'Content-type': 'application/json',
                'Authorization' : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Njc4ODM0OS1jMTRhLTQ4NjctOTZiZC0xYzExODU3ZGUyODQiLCJqdGkiOiJiNmYxMjg4MTFmMWUzZmJjMmIzYTkzMzY2MjIyZjIwYmExY2E1OGZmMGQyZjIyNTUyYzVlZTBlNDc5OWE1MjI4OWJkNjEwNWIxNjM3NzExYyIsImlhdCI6MTY1NDQ0MzQ2Ni45MjU5NzMsIm5iZiI6MTY1NDQ0MzQ2Ni45MjU5NzgsImV4cCI6MTY4NTk3OTQ2Ni45MTcyNTksInN1YiI6IjExIiwic2NvcGVzIjpbXX0.F7SHqQDw3-mYb6vqr_lStlsxMQOK86gtAE5pKbYNOVGcbVwPg_LPf4lpgMvoZoUsEcj3S6-7IviOdAewYmmMtIGtk-Fp_LG56OrMxTmW9CpB3cwJ99JWqXoU5GnMn7J7QyD4j4W46iz1U0I9ttTLgZ2b416O51DcVEyUcNFnjtqsM0_tj7Hku7Y-FKCLWxuzvEMZOAsG3qVk9L9O1fJBF7xoOR8hmMMMFR35-Wr1iXYrlkonb9HWTpIo3VyM1dGDgUcJhABFL79Wv37QCXbubttJsRR0sU5f3kSvaqnwyFZq_UTvEMl2QdFMU8G7GJfyGDZTfU0fGrOoLVlPcmMYA18RqDsyXzkKE9Pw4fwZl4I1VLYhKHlMnL9PVVH-X0DFsQEOWP3DWrnyRCvtmKdZJHA85kBM_e7e0IOECd-gx0tfMwmpXIJkNLKfzdIOKWk7u_ym9w3OaH3G9X4oxKY8E8xNgEl0TOVDXwCOToAWPpmjNlXrXJFKxnxYfv2oAhv8AAQw3zgyNa8fjCbocEPC68RRZHvvLK2k1pIYLg51IbcqWL27X75I0tguLWhKDvt2GGfuluNIWTyvwx253KaeEnkqcmlKIeoAdkpUNC3qGbITyUTZgVdGdhB5G2o1_R4FGrU9Cwm0OZIhLVvEfMa_4Ud0F7Ux9b-ifPVYNw1WlGk'
            }
        }).then((res) => {
            console.log(res.data.data.data)
            this.article = res.data.data.data
        }).catch((error) => {
            console.error(error)
        })
    }
}
</script>

<style>

</style>