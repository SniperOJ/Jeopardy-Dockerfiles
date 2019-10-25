import base64
import io
import sys
import pickle

from flask import Flask, Response, render_template, request
import favorite


app = Flask(__name__)


class Animal:
    def __init__(self, name, category):
        self.name = name
        self.category = category

    def __repr__(self):
        return f'Animal(name={self.name!r}, category={self.category!r})'

    def __eq__(self, other):
        return type(other) is Animal and self.name == other.name and self.category == other.category


class RestrictedUnpickler(pickle.Unpickler):
    def find_class(self, module, name):
        if module == '__main__':
            return getattr(sys.modules['__main__'], name)
        raise pickle.UnpicklingError("global '%s.%s' is forbidden" % (module, name))


def restricted_loads(s):
    return RestrictedUnpickler(io.BytesIO(s)).load()


def read(filename, encoding='utf-8'):
    with open(filename, 'r', encoding=encoding) as fin:
        return fin.read()


@app.route('/', methods=['GET', 'POST'])
def index():
    if request.args.get('source'):
        return Response(read(__file__), mimetype='text/plain')

    if request.method == 'POST':
        try:
            pickle_data = request.form.get('data')
            if b'R' in base64.b64decode(pickle_data):
                return 'No... I don\'t like R-things. No Rabits, Rats, Roosters or RCEs.'
            else:
                result = restricted_loads(base64.b64decode(pickle_data))
                if type(result) is not Animal:
                    return 'Are you sure that is an animal???'
            correct = (result == Animal(favorite.name, favorite.category))
            return render_template('unpickle_result.html', result=result, pickle_data=pickle_data, giveflag=correct)
        except Exception as e:
            print(repr(e))
            return "Something wrong"

    sample_obj = Animal('kitty', 'cat')
    pickle_data = base64.b64encode(pickle.dumps(sample_obj)).decode()
    return render_template('unpickle_page.html', sample_obj=sample_obj, pickle_data=pickle_data)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

