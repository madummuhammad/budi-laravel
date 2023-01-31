'use strict';
var token = document.querySelector("input[name=_token]").value;

// var token = $("input[name=_token]").val();
const e = React.createElement;

function Icon(props) {
    if (props.book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
        return (
            <div class="icon">
                <img src='/web/assets/icon/mic.svg' alt=""></img>
            </div>
        )
    } else if (props.book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
        return (
            <div class="icon">
                <img src='/web/assets/icon/play.svg' alt=""></img>
            </div>
        )
    } else {
        return (
            <div></div>
        )
    }
}
class LikeButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            liked: false,
            items: {
                book_types: [],
                books: []
            }

        };
        this.getBookType = this.getBookType.bind(this)
    }

    componentDidMount() {
        this.getBookType();
    }

    async getBookType() {
        var url = window.location.href;
        var id = url.split('/')[4];
        var endpoint = 'http:127.0.0.1:8000/book_type_api/' + id;
        // console.log(endpoint)
        var reqHeader = {
            "Content-Type": "application/json",
        };
        let postData = { id: id, _token: token };
        let options = {
            method: "POST",
            headers: reqHeader,
            body: JSON.stringify(postData),
        };
        const response = await fetch(id, options);
        const data = await response.json();
        if (data.status == "success") {
            this.setState({
                items: data.data,
            });
        }
    }

    render() {
        console.log(this.state.items.books)
        const result = this.state.items.books.map((value, index) => {
            return (
                <div class="col mb-4 item-paginate" key={index}>
                    <div class="card p-2">
                        <a href={'/book/' + value.id} class="text-decoration-none text-dark">
                            <div class="img-container-for-icon">
                                <img src={value.cover} alt="" class="img-fluid w-100"></img>
                                <Icon book_type={value.book_type}></Icon>
                            </div>
                        </a>
                    </div>
                </div>
            );
        });
        return (
            <div>
                <h3 className="mt-5 mb-3 fw-bold">Hasil Pencarian {this.state.items.book_types.name}</h3>
                <div className="row row-cols-2 row-cols-md-5">
                    {result}
                </div>
            </div>
        );
    }
}

const domContainer = document.querySelector('#book_type');
ReactDOM.render(e(LikeButton), domContainer);
