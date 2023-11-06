import React from 'react';
import { Navbar, Nav, Container, Modal, Button, Form } from 'react-bootstrap';

const Adminpanel: React.FC = () => {
  return (
    <>
      <Navbar bg="light" expand="xs" fixed="left" id="sidenav-main">
        <Container>
          <Navbar.Brand href="javascript:void(0)">
            <h1>Horizon Estate</h1>
          </Navbar.Brand>
          <Navbar.Toggle />
          <Navbar.Collapse id="sidenav-collapse-main">
            <Nav className="flex-column">
              <Nav.Link href="?Dashboard">
                <i className="ni ni-tv-2 text-primary"></i>
                <span className="nav-link-text">Dashboard</span>
              </Nav.Link>
              <Nav.Link href="?approveDeposit">
                <i className="ni ni-planet text-orange"></i>
                <span className="nav-link-text">View Property</span>
              </Nav.Link>
              <Nav.Link href="?users">
                <i className="ni ni-single-02 text-yellow"></i>
                <span className="nav-link-text">View Users</span>
              </Nav.Link>
              <Nav.Link href="?widrawal">
                <i className="ni ni-bullet-list-67 text-default"></i>
                <span className="nav-link-text">Create Product</span>
              </Nav.Link>
            </Nav>
          </Navbar.Collapse>
        </Container>
      </Navbar>

      <Container fluid className="main-content" id="panel">
        <Navbar expand="lg" bg="dark" variant="dark" className="border-bottom">
          <Container>
            <Navbar.Collapse id="navbarSupportedContent">
              <Nav className="ml-auto">
                <Nav.Item>
                  <Button
                    variant="dark"
                    className="sidenav-toggler sidenav-toggler-dark"
                    data-action="sidenav-pin"
                    data-target="#sidenav-main"
                  >
                    <div className="sidenav-toggler-inner">
                      <i className="sidenav-toggler-line"></i>
                      <i className="sidenav-toggler-line"></i>
                      <i className="sidenav-toggler-line"></i>
                      <i className="sidenav-toggler-line"></i>
                    </div>
                  </Button>
                </Nav.Item>
              </Nav>
            </Navbar.Collapse>
          </Container>
        </Navbar>
        <div id="all"></div>
      </Container>

      <Modal show={false} id="donateModal2">
        <Modal.Header style={{ backgroundColor: '#BEBEBE' }}>
          <Button variant="light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </Button>
          <Modal.Title id="donateModalLabel"></Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form action="#" method="post">
            <Form.Group>
              <Form.Label>Change Username</Form.Label>
              <Form.Control type="text" placeholder="Enter Username" name="username" required />
            </Form.Group>
            <Button
              variant="primary"
              style={{ width: '100%', backgroundColor: '#BEBEBE', border: 'none', cursor: 'pointer' }}
              id="bt"
              name="US"
            >
              Procced
            </Button>
          </Form>
        </Modal.Body>
      </Modal>

      <Modal show={false} id="mymod">
        <Modal.Header style={{ backgroundColor: '#BEBEBE' }}>
          <Button variant="light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </Button>
          <Modal.Title id="donateModalLabel"></Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form action="#" method="post">
            <Form.Group>
              <Form.Label>Change password</Form.Label>
              <Form.Control type="password" placeholder="Old password" name="oldp" required />
            </Form.Group>
            <Form.Group>
              <Form.Control type="password" placeholder="New Password" name="pass1" required />
            </Form.Group>
            <Form.Group>
              <Form.Control type="password" placeholder="Confirm-Password" name="cpaa" required />
            </Form.Group>
            <Button
              variant="primary"
              style={{ width: '100%', backgroundColor: '#BEBEBE', border: 'none', cursor: 'pointer' }}
              id="bt"
              name="me"
            >
              Procced
            </Button>
          </Form>
        </Modal.Body>
      </Modal>


        </>
      );
    };
    

export default Adminpanel