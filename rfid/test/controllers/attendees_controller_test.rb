require 'test_helper'

class AttendeesControllerTest < ActionController::TestCase
  setup do
    @attendee = attendees(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:attendees)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create attendee" do
    assert_difference('Attendee.count') do
      post :create, attendee: { card_number: @attendee.card_number, card_type: @attendee.card_type, email: @attendee.email, first_name: @attendee.first_name, last_name: @attendee.last_name, middle_name: @attendee.middle_name, org_id: @attendee.org_id, title: @attendee.title }
    end

    assert_redirected_to attendee_path(assigns(:attendee))
  end

  test "should show attendee" do
    get :show, id: @attendee
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @attendee
    assert_response :success
  end

  test "should update attendee" do
    patch :update, id: @attendee, attendee: { card_number: @attendee.card_number, card_type: @attendee.card_type, email: @attendee.email, first_name: @attendee.first_name, last_name: @attendee.last_name, middle_name: @attendee.middle_name, org_id: @attendee.org_id, title: @attendee.title }
    assert_redirected_to attendee_path(assigns(:attendee))
  end

  test "should destroy attendee" do
    assert_difference('Attendee.count', -1) do
      delete :destroy, id: @attendee
    end

    assert_redirected_to attendees_path
  end
end
