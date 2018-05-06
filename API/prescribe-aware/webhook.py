from flask import Flask, request, abort
import firebase_admin
from firebase_admin import credentials

app = Flask(__name__)

def setup_app(app):
    cred = credentials.Certificate('prescribe-aware-firebase-adminsdk-awiic-2391b7021b.json')
    default_app = firebase_admin.initialize_app(cred)

setup_app(app)

@app.route('/clinicalSummary', methods=['GET', 'POST'])
def test():
    if request.method == 'GET':
        token = str(request.args['challenge'])
        # return str(myvariable), 200
        return token, 200
    if request.method == 'POST':
        order = request.args['challenge']
        patientID = order["meta"]["patientID"][""]
        print(request.json)
        return '', 200
    else:
        abort(400)


if __name__ == '__main__':
    app.run()
