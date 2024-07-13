<div class="shop-product-fillter" style="margin-bottom: 0;">
    <div></div>
    <div class="sort-by-product-area">
        <div class="sort-by-cover mr-10">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span>
                        <i class="fi-rs-apps"></i>
                        Show:
                    </span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span>
                        <span id="show-per-page" data-per-page="{{ $products->perPage() }}">
                            {{ $products->perPage() }}
                        </span>
                        <i class="fi-rs-angle-small-down"></i>
                    </span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <ul>
                    <li>
                        <a class="per-page-link" data-per-page="50">50</a>
                    </li>
                    <li>
                        <a class="per-page-link" data-per-page="100">100</a>
                    </li>
                    <li>
                        <a class="per-page-link" data-per-page="150">150</a>
                    </li>
                    <li>
                        <a class="per-page-link" data-per-page="200">200</a>
                    </li>
                    <li>
                        <a class="per-page-link" data-per-page="{{ $products->total() }}">All</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sort-by-cover">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span>
                        <i class="fi-rs-apps-sort"></i>
                        Sort by:
                    </span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span>
                        <span id="show-filter" data-filter="{{ request('filter') ?? 'featured' }}">Featured</span>
                        <i class="fi-rs-angle-small-down"></i>
                    </span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <ul>
                    <li>
                        <a class="filter-link" data-filter="featured">Featured</a>
                    </li>
                    <li>
                        <a class="filter-link" data-filter="low-to-high">Price: Low to High</a>
                    </li>
                    <li>
                        <a class="filter-link" data-filter="high-to-low">Price: High to Low</a>
                    </li>
                    <li>
                        <a class="filter-link" data-filter="release-date">Release Date</a>
                    </li>
                    <li>
                        <a class="filter-link" data-filter="rating">Avg. Rating</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const perPageLinks = document.querySelectorAll('.per-page-link');
        const filterLinks = document.querySelectorAll(".filter-link");

        const products = document.querySelector('#products');
        const showPerPage = document.querySelector('#show-per-page')
        const showFilter = document.querySelector("#show-filter");



        perPageLinks.forEach(link => {
            link.addEventListener('click', async function(event) {
                event.preventDefault();

                const perPage = this.getAttribute('data-per-page');
                const filter = showFilter.getAttribute('data-filter');

                const url = `/products?filter=${filter}&per_page=${perPage}`;

                try {
                    const response = await fetch(url, {headers: {"X-Type": "partial"}});
                    const data = await response.text();

                    products.innerHTML = data;

                    showPerPage.innerHTML = this.innerHTML;
                    showPerPage.setAttribute("data-per-page", perPage);

                    perPageLinks.forEach(l => l.classList.remove("active"));
                    this.classList.add("active");

                    history.pushState(null, '', url);
                } catch (error) {
                    console.log('Error:', error);
                }
            });
        });

        filterLinks.forEach(link => {
            link.addEventListener('click', async function(event) {
                event.preventDefault();

                const perPage = showPerPage.getAttribute("data-per-page");
                const filter = this.getAttribute('data-filter');

                const url = `/products?filter=${filter}&per_page=${perPage}`;

                try {
                    const response = await fetch(url, {headers: {"X-Type": "partial"}});
                    const data = await response.text();

                    products.innerHTML = data;

                    showFilter.setAttribute("data-filter", filter);
                    showFilter.innerHTML = this.innerHTML;


                    filterLinks.forEach(l => l.classList.remove("active"));
                    link.classList.add("active");

                    history.pushState(null, '', url);
                } catch (error) {
                    console.log('Error:', error);
                }
            });
        });


        perPageLinks.forEach(l => {
            if (l.getAttribute("data-per-page") === showPerPage.getAttribute("data-per-page")) {
                l.classList.add("active")
            }
        });

        filterLinks.forEach(l => {
            if (l.getAttribute("data-filter") === showFilter.getAttribute("data-filter")) {
                l.classList.add("active")
            }
        });


    });
</script>